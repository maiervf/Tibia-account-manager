import { NgModule }      from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { FormsModule }   from '@angular/forms';
import { HttpModule, JsonpModule } from '@angular/http';
 
import { AppComponent }  from './app.component';
import { routing, routedComponents } from './app.routing';
import { AccountFormComponent } from './account-form.component';
 
@NgModule({
  imports: [
    BrowserModule,
    FormsModule,
    routing,
    HttpModule,
    JsonpModule
  ],
  declarations: [
    AppComponent,
    routedComponents,
    AccountFormComponent
  ],
  bootstrap: [ AppComponent ]
})
export class AppModule { }