import { NgModule }      from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { FormsModule }   from '@angular/forms';
 
import { AppComponent }  from './app.component';
import { AccountFormComponent } from './account-form.component';
 
@NgModule({
  imports: [
    BrowserModule,
    FormsModule
  ],
  declarations: [
    AppComponent,
    AccountFormComponent
  ],
  bootstrap: [ AppComponent ]
})
export class AppModule { }