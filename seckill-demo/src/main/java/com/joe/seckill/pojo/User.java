package com.joe.seckill.pojo;

import com.baomidou.mybatisplus.annotation.TableName;
import lombok.Data;
import lombok.EqualsAndHashCode;

import java.io.Serializable;
import java.util.Date;

/**
 * <p>
 * 
 * </p>
 *
 * @author zhoubin
 * @since 2021-01-13
 */
@Data
@EqualsAndHashCode(callSuper = false)
@TableName("t_user")
public class User implements Serializable {

    private static final long serialVersionUID = 1L;

    /**
     * id = users telephone
     */
    private Long id;

    private String nickname;

    /**
     * double md5 to encrypt
     */
    private String password;

    private String salt;

    /**
     * headshot
     */
    private String head;

    /**
     * time of registration
     */
    private Date registerDate;

    /**
     * time of last login
     */
    private Date lastLoginDate;

    /**
     * how many of login
     */
    private Integer loginCount;


}
