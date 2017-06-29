export class Account {

	constructor(
		public id?: number,
		public name?: string,
		public password?: string,
		public email?: string,
		public secret?: string,
		public type?: number,
		public premdays?: number,
		public lastday?: string,
		public creation?: string,
	) {  }

}