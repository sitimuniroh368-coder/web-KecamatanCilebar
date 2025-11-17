document.addEventListener('DOMContentLoaded', function () {
	// Tabs for profile page
	const tabContainer = document.querySelector('.profile-tabs');
	if (tabContainer) {
		const tabs = tabContainer.querySelectorAll('.profile-tab');
		const panels = tabContainer.querySelectorAll('.profile-panel');
		tabs.forEach(tab => {
			tab.addEventListener('click', () => {
				// activate tab
				tabs.forEach(t => t.classList.remove('is-active'));
				tab.classList.add('is-active');
				// show panel
				panels.forEach(p => { p.classList.remove('is-active'); p.hidden = true; });
				const target = tab.getAttribute('data-target');
				const panel = target ? document.querySelector(target) : null;
				if (panel) { panel.classList.add('is-active'); panel.hidden = false; }
			});
		});
	}
});


