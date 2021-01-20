package com.joe.seckill.vo;

import com.joe.seckill.utils.ValidatorUtil;
import com.joe.seckill.validator.isMobile;
import org.thymeleaf.util.StringUtils;

import javax.validation.ConstraintValidator;
import javax.validation.ConstraintValidatorContext;

public class IsMobileValidator implements ConstraintValidator<isMobile,String> {

    public boolean required = false;

    @Override
    public void initialize(isMobile constraintAnnotation){
        required = constraintAnnotation.required();
    }

    @Override
    public boolean isValid(String s, ConstraintValidatorContext constraintValidatorContext) {
        if(required){
            return ValidatorUtil.isMobile(s);
        }
        else{
            if(StringUtils.isEmpty(s)){
                return true;
            }
            else{
                return ValidatorUtil.isMobile(s);
            }
        }
    }
}
