import { Injectable } from '@angular/core';
import { Http, Headers } from '@angular/http';
import 'rxjs/add/operator/map';

@Injectable()
export class AuthServiceProvider {
  url: any;
  url2: any;
  login: string;
  log : any;
  token : any;
  goreg: any;
  postFeed: any;
  constructor(public http: Http) {
    // this.url = "http://localhost/laravel-auth/public/api/feeds";
    // this.url2 = "http://localhost/laravel-auth/public/api/user";
    // this.login = "http://localhost/laravel-auth/public/api/authenticate";
    // this.goreg = "http://localhost/laravel-auth/public/api/register";
    // this.postFeed = "http://localhost/laravel-auth/public/api/newsfeed";
    
    this.url = "http://archive.websiteprojectupdates.com/microblog/public/api/feeds";
    this.url2 = "http://archive.websiteprojectupdates.com/microblog/public/api/user";
    this.login = "http://archive.websiteprojectupdates.com/microblog/public/api/authenticate";
    this.goreg = "http://archive.websiteprojectupdates.com/microblog/public/api/register";
    this.postFeed = "http://archive.websiteprojectupdates.com/microblog/public/api/newsfeed";

  }

  userLogin(username, password){
    let headers = new Headers();

    headers.append('Content-Type', 'application/json');

    let body = {
      "username": username,
      "password": password
    };

    return this.http.post(this.login, JSON.stringify(body),{headers: headers} )
    .map(res => res.json());
    
  }

  userRegister(firstname,lastname,email,username,password){
    let headers = new Headers();

    headers.append('Content-Type', 'application/json');

    let body = {
      "firstname": firstname,
      "lastname": lastname,
      "email": email,
      "username": username,
      "password": password
    };
    return this.http.post(this.goreg, JSON.stringify(body),{headers: headers} )
    .map(res => res.json());
  }

  viewFeeds(start){
    const data = JSON.parse(localStorage.getItem('token'));
    return this.http.get(this.url+"?token="+data.token +"&start=" +start).map(res=> res.json());
  }

  users(){
    const data = JSON.parse(localStorage.getItem('token'));
    return this.http.get(this.url2+"?token="+data.token).map(res=> res.json());
  }

  feeds(feed) {
    let headers = new Headers();

    headers.append('Content-Type', 'application/json');

    let body = {
      "feed": feed
    };

    const data = JSON.parse(localStorage.getItem('token'));
    return this.http.post(this.postFeed+"?token="+data.token, JSON.stringify(body),{headers: headers} ).map(res => res.json());
  }
}