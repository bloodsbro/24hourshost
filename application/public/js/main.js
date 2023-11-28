
function redirect(url) {
	document.location.href=url;
}

function reload() {
	window.location.reload();
}

Promise.allSettled = Promise.allSettled || ((promises) => Promise.all(
	promises.map(p => p
		.then(value => ({
			status: "fulfilled",
			value
		}))
		.catch(reason => ({
			status: "rejected",
			reason
		}))
	)
));