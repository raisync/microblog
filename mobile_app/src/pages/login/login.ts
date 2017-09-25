import { MenuPage } from './../menu/menu';
import { SignupPage } from './../signup/signup';
import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, AlertController, ToastController } from 'ionic-angular';
import { AuthServiceProvider } from '../../providers/auth-service/auth-service';
import { SQLite, SQLiteObject } from '@ionic-native/sqlite';

/**
 * Generated class for the LoginPage page.
 *
 * See http://ionicframework.com/docs/components/#navigation for more info
 * on Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-login',
  templateUrl: 'login.html',
})
export class LoginPage {
  username: any;
  password: any;
  log: any;
  token: any;
  constructor(public navCtrl: NavController, public navParams: NavParams, public authProv : AuthServiceProvider,public alertCtrl: AlertController, private toastCtrl:ToastController) {
   // if(localStorage.getItem("token") != "") {
   //   this.navCtrl.setRoot(MenuPage);
   // }
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad LoginPage');
  }

  clickSubmit(){
    if(this.username && this.password ){
    this.authProv.userLogin(this.username, this.password).subscribe(log => {
      console.log(this.log = log);

      if(this.log == false) {
        this.presentToast("Please give valid information");
      } else {
        localStorage.setItem("token", JSON.stringify(this.log));
        this.navCtrl.setRoot(MenuPage, this.log.key);
      }
      
    }); } else {
        this.presentToast("Please fill in all the fields");
    }
    
  }

  clickRegister(){
    this.navCtrl.push(SignupPage);
  }
    
    presentToast(msg) {
      let toast = this.toastCtrl.create({
        message: msg,
        duration: 2000
      });
      toast.present();
    }

}
