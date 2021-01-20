package com.joe.seckill.rabbitmq;

import lombok.extern.slf4j.Slf4j;
import org.springframework.amqp.rabbit.annotation.RabbitListener;
import org.springframework.stereotype.Service;
import com.joe.seckill.pojo.User;
import com.joe.seckill.service.IGoodsService;
import com.joe.seckill.service.IOrderService;
import com.joe.seckill.utils.JsonUtil;
import com.joe.seckill.vo.GoodsVo;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.redis.core.RedisTemplate;
import org.springframework.util.StringUtils;


@Service
@Slf4j
public class MQReceiver {
  @Autowired
  private IGoodsService goodsService;
  @Autowired
  private RedisTemplate redisTemplate;
  @Autowired
  private IOrderService orderService;
  @RabbitListener(queues = "seckillQueue")
  public void receive(String msg) {
   log.info("QUEUE接受消息：" + msg);
   SeckillMessage message = JsonUtil.jsonStr2Object(msg,
                SeckillMessage.class);
   Long goodsId = message.getGoodsId();
   User user = message.getUser();
   GoodsVo goods = goodsService.findGoodsVoByGoodsId(goodsId);
   //判断库存
   if (goods.getStockCount() < 1) {
     return;
   }
   //判断是否重复抢购
   // SeckillOrder seckillOrder = seckillOrderService.getOne(newQueryWrapper<SeckillOrder>().eq("user_id",
                  //    user.getId()).eq(
                  //    "goods_id",
                  //    goodsId));
      String seckillOrderJson = (String) redisTemplate.opsForValue().get("order:" + user.getId() + ":" + goodsId);
   if (!StringUtils.isEmpty(seckillOrderJson)) {
     return;
   }
   orderService.seckill(user, goods);
  }
}
