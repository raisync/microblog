import { LoginPage } from './../login/login';
import { PageInterface } from './menu';
import { Component, ViewChild } from '@angular/core';
import { IonicPage, NavController, NavParams, Nav, App } from 'ionic-angular';

export interface PageInterface {
  title: string;
  pageName: string;
  tabComponent?: any;
  index?: number;
  icon: string;
}
/**
 * Generated class for the MenuPage page.
 *
 * See http://ionicframework.com/docs/components/#navigation for more info
 * on Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-menu',
  templateUrl: 'menu.html',
})
export class MenuPage {
  token: any;
  rootPage = 'FeedsPage';

  @ViewChild(Nav) nav: Nav;

  pages: PageInterface[] = [
    { title: 'Profile', pageName: 'ProfilePage', index: 0, icon: 'person' },
    { title: 'Newsfeed', pageName: 'FeedsPage', index: 1, icon: 'paper' }
  ]

  constructor(public navCtrl: NavController, public navParams: NavParams, public app: App) {
    this.token = this.navParams.data;
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad MenuPage');
  }

  doLogout() {
    localStorage.setItem('token', '');
    this.navCtrl.setRoot(LoginPage);
  }

  openPage(page: PageInterface) {
    let params = {};

    if (page.index) {
      params = { tabIndex: page.index };
    }

    if (this.nav.getActiveChildNav() && page.index != undefined) {
      this.nav.getActiveChildNav().select(page.index);
    } else {
      this.nav.setRoot(page.pageName, params);
    }
  }

  isActive(page: PageInterface) {

  }

}
