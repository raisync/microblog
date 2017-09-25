import { Component, ViewChild } from '@angular/core';
import { Http, Headers } from '@angular/http';
import { IonicPage, NavController, NavParams, ToastController, Content } from 'ionic-angular';
import { AuthServiceProvider } from '../../providers/auth-service/auth-service';
import { MenuPage } from './../menu/menu';

/**
 * Generated class for the FeedsPage page.
 *
 * See http://ionicframework.com/docs/components/#navigation for more info
 * on Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-feeds',
  templateUrl: 'feeds.html',
})
export class FeedsPage {
  @ViewChild(Content) content: Content;
	token : any = [];
	feed : string;
	pos : any;
  start = 0;
  public scrollBot: boolean = false;

  constructor(public navCtrl: NavController, public navParams: NavParams, public authProv : AuthServiceProvider, private toastCtrl:ToastController) {
    this.loadFeedData(this.start);
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad FeedsPage');
  }

  post() {
    if(this.feed){
      this.authProv.feeds(this.feed).subscribe(res=> {
        this.loadFeedData(this.start);
        this.refresh();
      }); } else {
        this.presentToast("There is nothing to post");
      }
  }
    
  presentToast(msg) {
    let toast = this.toastCtrl.create({
      message: msg,
      duration: 2000
    });
    toast.present();
  }

  loadFeedData(start){
    this.authProv.viewFeeds(start).subscribe(res=> {
      // this.token = res;
        for (let i = 0; i < res.length; i++) {
          this.token.push( res[i] );
        }
      console.log('res length', res.length)
      if(res.length < 5) {
        this.scrollBot = false;
      } else if(res.length == 5) {
        this.scrollBot = true;
      }
    });
  }

// Load more -----------------------------
  public scrollElement() {
    let element = document.getElementById('scroll');
    this.content.scrollTo(0, element.offsetTop, 200);
  }
  
// infinite scroll -----------------------
    doInfinite(infiniteScroll) {
      console.log('Begin async operation');
      this.start += 5;
      setTimeout(() => {
          this.loadFeedData(this.start);
          console.log('Async operation has ended');
          infiniteScroll.complete();
      }, 200);
  }
//----------------------------------------
  
  refresh() {
    this.navCtrl.setRoot(this.navCtrl.getActive().component);
  }

  scrollBtm() {
    this.scrollBot = !this.scrollBot;
  }

}
