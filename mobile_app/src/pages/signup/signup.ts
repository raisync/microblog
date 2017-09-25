import { LoginPage } from './../login/login';
import { Component } from '@angular/core';
import { IonicPage, NavController, AlertController, NavParams, ToastController } from 'ionic-angular';
import { AuthServiceProvider } from '../../providers/auth-service/auth-service';
import { CommonProvider } from "../../providers/common/common";


@IonicPage()
@Component({
  selector: 'page-signup',
  templateUrl: 'signup.html',
})
export class SignupPage {
  reg : any;
  firstname : string;
  lastname : string;
  email : string;
  username : string;
  password: string;
  constructor(public navCtrl: NavController, public navParams: NavParams,public alertCtrl: AlertController, public authProv : AuthServiceProvider, public commonProv : CommonProvider, private toastCtrl:ToastController) {
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad SignupPage');
  }

  clickSubmit(){
    if(this.username && this.password && this.firstname && this.lastname && this.email ){
      this.authProv.userRegister(this.firstname, this.lastname, this.email, this.username, this.password)
      .subscribe(reg=> {
        console.log(this.reg = reg);
        if(this.reg != false){
          this.regOk();
          this.navCtrl.setRoot(LoginPage);
        } else {
          this.presentToast("Something went wrong");
        }
      }); } else {
        this.presentToast("Please fill in all the fields");
      }
    }
    
    regOk() {
      let alert = this.alertCtrl.create({
        title: 'Success!',
        subTitle: 'You are now registered',
        buttons: ['OK']
      });
      alert.present();
    }
    
    presentToast(msg) {
      let toast = this.toastCtrl.create({
        message: msg,
        duration: 2000
      });
      toast.present();
    }
    
  }
