/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package me.hsanchez.practica3.listener;

/**
 *
 * @author hsanchez <hsanchez.dev@gmail.com>
 */
public interface SubmitEventListener<T> {
    void handle(T payload);
}
