/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package me.hsanchez.practica3.dto;

import com.google.gson.annotations.Expose;

/**
 *
 * @author hsanchez <hsanchez.dev@gmail.com>
 */
public class SuccessResponseDTO {

    @Expose
    private String message;

    public String getMessage() {
        return message;
    }

    public void setMessage(String message) {
        this.message = message;
    }

}
