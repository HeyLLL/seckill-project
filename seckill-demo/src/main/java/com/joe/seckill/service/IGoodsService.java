package com.joe.seckill.service;

import com.baomidou.mybatisplus.extension.service.IService;
import com.joe.seckill.pojo.Goods;
import com.joe.seckill.vo.GoodsVo;

import java.util.List;


public interface IGoodsService extends IService<Goods> {

    // 获取商品列表
    List<GoodsVo> findGoodsVo();

    // 获取商品详情
    GoodsVo findGoodsVoByGoodsId(Long goodsId);
}
