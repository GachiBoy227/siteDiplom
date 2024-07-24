package sample;

import javafx.scene.control.Button;

import javax.swing.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;


public class BtnAnim  {
    private Button button;
    boolean isanimation=false;
    double minscale;
    double scalewalk;
    BtnAnim(Button button,double minscale,double scalewalk){
        this.button=button;
        this.minscale=minscale;
        this.scalewalk=scalewalk;
    }
    private void anim(){

            if (isanimation) {
                if (button.getScaleX() > minscale && button.getScaleY() > minscale) {
                        button.setScaleX(button.getScaleX()-scalewalk);
                    button.setScaleY(button.getScaleY()-scalewalk);
                }else{
                    isanimation=false;
                }
            }
            else{
                if (button.getScaleX() < 1 && button.getScaleY() < 1) {
                    button.setScaleX(button.getScaleX()+scalewalk);
                    button.setScaleY(button.getScaleY()+scalewalk);
                }

            }
        }
  public void animationing() {
      if (button.isPressed()) {
          isanimation = true;

      }
      anim();
  }
}
