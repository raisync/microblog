import { Injectable } from '@angular/core';
import { LoadingController, ToastController } from 'ionic-angular';
import 'rxjs/add/operator/map';

@Injectable()
export class CommonProvider {
  public loader: any;

  constructor(public loadingCtrl: LoadingController, private toastCtrl:ToastController) {
    console.log('Hello CommonProvider Provider');
  }
  
  presentLoading(){
    this.loader = this.loadingCtrl.create({content: "Please wait ..."})
  this.loader.present();
  }

  closeLoading(){
  this.loader.dismiss();
  }
  
  presentToast(msg) {
    let toast = this.toastCtrl.create({
      message: msg,
      duration: 2000
    });
    toast.present();
  }

}