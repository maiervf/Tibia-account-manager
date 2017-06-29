import { Routes, RouterModule}  from '@angular/router';
import { AccountFormComponent } from './account-form.component';

const appRoutes: Routes = [
	// Add the redirect
	{
		path: '',
		redirectTo: '/login',
		pathMatch: 'full'
	},
	// Add our routes
	{
		path: 'login',
		component: AccountFormComponent
	},
	// Redirect any route to login
	{
		path: '**', redirectTo: '/login', pathMatch: 'full'
	}
];

// Here we are exporting our routes
export const routing = RouterModule.forRoot(appRoutes);
// Here we are combining our routing components into a single array. We will use this a little later when we update our root module
export const routedComponents = [AccountFormComponent];