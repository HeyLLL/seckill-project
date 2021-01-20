package com.joe.seckill.controller;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.RequestMapping;

@Controller
@RequestMapping("/demo")
public class DemoController {
    // this is a test for jump between viewer
    @RequestMapping("/hello")
    public String hello(Model model){
        model.addAttribute("name","joe");
        return "hello";
    }
}
