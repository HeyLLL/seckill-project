package com.joe.seckill.mapper;

import com.baomidou.mybatisplus.core.mapper.BaseMapper;
import com.joe.seckill.pojo.Goods;
import com.joe.seckill.vo.GoodsVo;

import java.util.List;

/**
 * <p>
 *  Mapper 接口
 * </p>
 *
 * @author zhoubin
 * @since 2021-01-16
 */
public interface GoodsMapper extends BaseMapper<Goods> {

    List<GoodsVo> findGoodsVo();

    // 获取商品详情
    GoodsVo findGoodsVoByGoodsId(Long goodsId);
}
