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
	model = new Account();
	submitted = false;

	ngOnInit() { 
		this.getAccounts(); 
	}

	getAccounts() {
		this.accountService.getAccounts().subscribe(accounts => this.accounts = accounts);
	}

	onSubmit() {
		this.accountService.submitForm(this.model).subscribe(response => console.log(response));
		this.submitted = true; 
	}
}