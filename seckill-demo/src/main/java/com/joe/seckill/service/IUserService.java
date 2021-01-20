package com.joe.seckill.service;

import com.baomidou.mybatisplus.extension.service.IService;
import com.joe.seckill.pojo.User;
import com.joe.seckill.vo.LoginVo;
import com.joe.seckill.vo.RespBean;

import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;



//登陆
public interface IUserService extends IService<User> {

    RespBean doLogin(LoginVo loginVo, HttpServletRequest request, HttpServletResponse response);

    // 根据cookie获取用户
    User getUserByCookie(String userTicket, HttpServletRequest request, HttpServletResponse response);

    RespBean updatePassword(String userTicket,Long id,String password);
}
