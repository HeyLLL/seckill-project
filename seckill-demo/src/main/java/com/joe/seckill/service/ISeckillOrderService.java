package com.joe.seckill.service;

import com.baomidou.mybatisplus.extension.service.IService;
import com.joe.seckill.pojo.SeckillOrder;
import com.joe.seckill.pojo.User;

public interface ISeckillOrderService extends IService<SeckillOrder> {
    Long getResult(User user, Long goodsId);
}
