import { NgModule } from '@angular/core';
import { IonicPageModule } from 'ionic-angular';
import { FeedsPage } from './feeds';
import { MomentModule } from 'angular2-moment';

@NgModule({
  declarations: [
    FeedsPage,
  ],
  imports: [
    MomentModule,
    IonicPageModule.forChild(FeedsPage),
  ],
})
export class FeedsPageModule {}
