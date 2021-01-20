package com.joe.seckill.service;
import com.baomidou.mybatisplus.extension.service.IService;
import com.joe.seckill.pojo.Order;
import com.joe.seckill.pojo.User;
import com.joe.seckill.vo.GoodsVo;
import com.joe.seckill.vo.OrderDetailVo;

public interface IOrderService extends IService<Order> {
    Order seckill(User user, GoodsVo goods);

    OrderDetailVo detail(Long orderId);

    boolean checkPath(User user, Long goodsId, String path);

    String createPath(User user, Long goodsId);

    boolean checkCaptcha(User user, Long goodsId, String captcha);
}
