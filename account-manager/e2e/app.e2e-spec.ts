import { AccountManagerPage } from './app.po';

describe('account-manager App', () => {
  let page: AccountManagerPage;

  beforeEach(() => {
    page = new AccountManagerPage();
  });

  it('should display welcome message', () => {
    page.navigateTo();
    expect(page.getParagraphText()).toEqual('Welcome to app!!');
  });
});
