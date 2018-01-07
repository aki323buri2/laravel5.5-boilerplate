import React from 'react';
import { render } from 'react-dom';
import ErrMessage from './errMessage';
Promise.resolve().then(e =>
{
	throw 'test.';
})
.catch(err =>
{
	render(<ErrMessage err={err}/>, document.querySelector('#err'));
	console.error(err);
});
