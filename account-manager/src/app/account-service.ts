import { Injectable }              from '@angular/core';
import { Http, Response }          from '@angular/http';
import { Headers, RequestOptions } from '@angular/http';
import { Observable }              from 'rxjs/Observable';
import { Account }                 from './account';
import 'rxjs/add/operator/map';
 
@Injectable()
export class AccountService {
	
	private serverAddress = "http://127.0.0.1:8080/showAccounts";  // URL to web API

	constructor (private http: Http) {  }

	getAccounts(): Observable<Account[]> {
		return this.http.get(this.serverAddress).map(res => res.json());
	}

	create(name: string): Observable<Account> {
		let headers = new Headers({ 'Content-Type': 'application/json' });
		let options = new RequestOptions({ headers: headers });

		return this.http.post(this.serverAddress, { name }, options)
										.map(res => res.json());
	}

}