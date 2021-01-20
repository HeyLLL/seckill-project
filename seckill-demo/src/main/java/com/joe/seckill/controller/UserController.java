package com.joe.seckill.controller;
import com.joe.seckill.pojo.User;
import com.joe.seckill.rabbitmq.MQSender;
import com.joe.seckill.vo.RespBean;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.ResponseBody;


@Controller
@RequestMapping("/user")
public class UserController {
    @Autowired
    private MQSender mqSender;

    @RequestMapping("/info")
    @ResponseBody
    public RespBean info(User user) {
        return RespBean.success(user);
    }
}


//    /**
//     * 测试发送RabbitMQ消息
//     */
//    @RequestMapping("/mq/topic01")
//    @ResponseBody
//    public void mq01() {
//        mqSender.send01("Hello,Red");
//    }
//    /**
//     * 测试发送RabbitMQ消息
//     */
//    @RequestMapping("/mq/topic02")
//    @ResponseBody
//    public void mq02() {
//        mqSender.send02("Hello,Green");
//    }
//}
