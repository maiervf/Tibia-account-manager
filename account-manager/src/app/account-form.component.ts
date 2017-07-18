import { Component, OnInit } from '@angular/core';
import { AccountService }    from './account-service';
import { Account } 			 from './account';

@Component({
	selector: 'account-form',
	templateUrl: './account-form.component.html',
	providers: [AccountService]
})

export class AccountFormComponent implements OnInit{
	constructor (private accountService: AccountService) {  }
	
	accounts: Account[];
	signin = new Account();
	submitted = false;
	formType = "login";

	ngOnInit() { 
		this.getAccounts(); 
	}

	getAccounts() {
		this.accountService.getAccounts().subscribe(accounts => this.accounts = accounts);
	}

	onSubmit() {
		this.accountService.submitForm(this.signin).subscribe(response => console.log(response));
		this.submitted = true; 
	}

	setForm(type) {
		this.formType = type;
	}

	login(loginForm) {
		this.accountService.login(loginForm).subscribe(response => console.log(response));
	}
}