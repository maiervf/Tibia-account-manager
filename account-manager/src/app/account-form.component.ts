import { Component } from '@angular/core';

import { Account } from './account';

@Component({
  selector: 'account-form',
  templateUrl: './account-form.component.html'
})

export class AccountFormComponent {

  model = new Account();

  submitted = false;

  onSubmit() { this.submitted = true; }
}