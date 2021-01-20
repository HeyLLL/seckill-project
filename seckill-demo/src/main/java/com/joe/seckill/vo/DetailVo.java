package com.joe.seckill.vo;

import com.joe.seckill.pojo.User;
import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;
/**
 * @author zhoubin
 * @since 1.0.0
 */
@Data
@NoArgsConstructor
@AllArgsConstructor
public class DetailVo {
  private User user;
  private GoodsVo goodsVo;
  private int secKillStatus;
  private int remainSeconds;
}