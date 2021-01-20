package com.joe.seckill.service.impl;
import com.baomidou.mybatisplus.core.conditions.query.QueryWrapper;
import com.baomidou.mybatisplus.core.conditions.update.UpdateWrapper;
import com.baomidou.mybatisplus.extension.service.impl.ServiceImpl;
import com.joe.seckill.exception.GlobalException;
import com.joe.seckill.mapper.OrderMapper;
import com.joe.seckill.pojo.Order;
import com.joe.seckill.pojo.SeckillGoods;
import com.joe.seckill.pojo.SeckillOrder;
import com.joe.seckill.pojo.User;
import com.joe.seckill.service.IGoodsService;
import com.joe.seckill.service.IOrderService;
import com.joe.seckill.service.ISeckillGoodsService;
import com.joe.seckill.service.ISeckillOrderService;
import com.joe.seckill.utils.JsonUtil;
import com.joe.seckill.utils.MD5Util;
import com.joe.seckill.utils.UUIDUtil;
import com.joe.seckill.vo.GoodsVo;
import com.joe.seckill.vo.OrderDetailVo;
import com.joe.seckill.vo.RespBeanEnum;
import org.apache.commons.lang3.StringUtils;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.redis.core.RedisTemplate;
import org.springframework.data.redis.core.ValueOperations;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;
import java.util.Date;
import java.util.concurrent.TimeUnit;


@Service
public class OrderServiceImpl extends ServiceImpl<OrderMapper, Order> implements IOrderService {
    @Autowired
    private ISeckillGoodsService seckillGoodsService;
    @Autowired
    private IGoodsService goodsService;
    @Autowired
    private OrderMapper orderMapper;
    @Autowired
    private ISeckillOrderService seckillOrderService;
    @Autowired
    private RedisTemplate redisTemplate;


    @Override
    @Transactional
    public Order seckill(User user, GoodsVo goods) {
          ValueOperations valueOperations = redisTemplate.opsForValue();
          //秒杀商品表减库存
          SeckillGoods seckillGoods = seckillGoodsService.getOne(new
                        QueryWrapper<SeckillGoods>().eq("goods_id", goods.getId()));
          boolean seckillGoodsResult = seckillGoodsService.update(
                            new UpdateWrapper<SeckillGoods>().setSql("stock_count = stock_count- 1").eq("goods_id", goods.getId()).gt("stock_count", 0));
                         // seckillGoodsService.updateById(seckillGoods);
          if (seckillGoods.getStockCount() < 1) {
           //判断是否还有库存
           valueOperations.set("isStockEmpty:" + goods.getId(), "0");
           return null;
          }
          //生成订单
          Order order = new Order();
          order.setUserId(user.getId());
          order.setGoodsId(goods.getId());
          order.setDeliveryAddrId(0L);
          order.setGoodsName(goods.getGoodsName());
          order.setGoodsCount(1);
          order.setGoodsPrice(seckillGoods.getSeckillPrice());
          order.setOrderChannel(1);
          order.setStatus(0);
          order.setCreateDate(new Date());
          orderMapper.insert(order);
          //生成秒杀订单
          SeckillOrder seckillOrder = new SeckillOrder();
          seckillOrder.setOrderId(order.getId());
          seckillOrder.setUserId(user.getId());
          seckillOrder.setGoodsId(goods.getId());
          seckillOrderService.save(seckillOrder);
          valueOperations.set("order:" + user.getId() + ":" + goods.getId(),
                            JsonUtil.object2JsonStr(seckillOrder));
          return order; }

    @Override
    public OrderDetailVo detail(Long orderId) {
        if (null == orderId) {
            throw new GlobalException(RespBeanEnum.ORDER_NOT_EXIST);
        }
        Order order = orderMapper.selectById(orderId);
        GoodsVo goodsVo = goodsService.findGoodsVoByGoodsId(order.getGoodsId());
        OrderDetailVo detail = new OrderDetailVo();
        detail.setGoodsVo(goodsVo);
        detail.setOrder(order);
        return detail;
    }

    /**
     * 验证请求地址
     *
     * @param user
     * @param goodsId
     * @param path
     * @return
     */
    @Override
    public boolean checkPath(User user, Long goodsId, String path) {
          if (user==null|| StringUtils.isEmpty(path)){
           return false;
          }
          String redisPath = (String) redisTemplate.opsForValue().get("seckillPath:" +
                        user.getId() + ":" + goodsId);
          return path.equals(redisPath);
    }
    /**
     * 生成秒杀地址
     *
     * @param user
     * @param goodsId
     * @return
     */
    @Override
    public String createPath(User user, Long goodsId) {
      String str = MD5Util.md5(UUIDUtil.uuid() + "123456");
      redisTemplate.opsForValue().set("seckillPath:" + user.getId() + ":" +
                    goodsId, str, 60, TimeUnit.SECONDS);
      return str; }


    /**
     * 校验验证码
     *
     * @param user
     * @param goodsId
     * @param captcha
     * @return
     */
    @Override
    public boolean checkCaptcha(User user, Long goodsId, String captcha) {
      if (StringUtils.isEmpty(captcha)||null==user||goodsId<0){
       return false;
      }
      String redisCaptcha = (String) redisTemplate.opsForValue().get("captcha:" + user.getId() + ":" + goodsId);
      return redisCaptcha.equals(captcha);
    }
}
