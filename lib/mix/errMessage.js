import React from 'react';
const ErrMessage = ({
	err, 
}) => (
	<div className="err message is-danger">
		<div className="message-header">
			<p>
				<span className="icon"><i className="fas fa-exclamation-triangle"></i></span>
				<span>Error!</span>
			</p>
		</div>
		<div className="message-body">
			{err.toString()}
		</div>
	</div>
);
export default ErrMessage;