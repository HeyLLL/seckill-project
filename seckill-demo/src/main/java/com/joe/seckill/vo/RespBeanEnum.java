package com.joe.seckill.vo;

// 公共返回对象枚举

import lombok.AllArgsConstructor;
import lombok.Getter;
import lombok.ToString;

@Getter
@ToString
@AllArgsConstructor
public enum RespBeanEnum {
    // common
    ERROR(500,"Wrong with server"),
    SUCCESS(200,"Success"),
    // login
    LOGIN_ERROR(500210,"用户名或密码错误"),
    MOBILE_ERROR(500211,"手机号码不正确"),
    // binding error
    BIND_ERROR(500212,"参数校验异常"),
    // stock error
    EMPTY_STOCK(500500,"库存不足"),
    REPEATE_ERROR(500501,"该商品每人限购一件"),
    // 对象缓存
    MOBILE_NOT_EXIST(500213, "手机号码不存在"),
    PASSWORD_UPDATE_FAIL(500214, "密码更新失败"),
    // 秒杀页面静态化
    SESSION_ERROR(500215,"用户不存在"),
    // 订单信息不存在
    ORDER_NOT_EXIST(500300,"订单信息不存在"),
    REQUEST_ILLEGAL(500301,"非法请求"),
    ERROR_CAPTCHA(500302,"验证码错误"),
    ;

    private final Integer code;
    private final String message;
}
