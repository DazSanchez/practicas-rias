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
public class PayloadWithIdDTO {

    @Expose
    private int id;

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

}
