import { Component } from '@angular/core';
import { IonicPage, NavController } from 'ionic-angular';
import { AuthServiceProvider } from '../../providers/auth-service/auth-service';

/**
 * Generated class for the ProfilePage page.
 *
 * See http://ionicframework.com/docs/components/#navigation for more info
 * on Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-profile',
  templateUrl: 'profile.html',
})
export class ProfilePage {
  token : any;
  username : string;
  firstname : string;
  lastname : string;
  email : string;

  constructor(public navCtrl: NavController, public authProv : AuthServiceProvider) {
    this.authProv.users().subscribe(res=> {
      this.username = res.username,
      this.firstname = res.firstname,
      this.lastname = res.lastname,
      this.email = res.email
      });
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad ProfilePage');
  }

}
