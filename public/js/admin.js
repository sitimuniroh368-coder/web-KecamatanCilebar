document.addEventListener('DOMContentLoaded', function () {
	// Function to show Sweet Alert confirmation
	function showDeleteConfirmation(message, callback) {
		// If SweetAlert2 not loaded, fallback to native confirm
		if (typeof Swal === 'undefined') {
			if (confirm(message || 'Yakin hapus data?')) {
				callback();
			}
			return;
		}

		Swal.fire({
			icon: 'warning',
			title: 'Yakin hapus data?',
			text: message || 'Tindakan ini tidak dapat dibatalkan.',
			showCancelButton: true,
			confirmButtonText: 'Ya',
			cancelButtonText: 'Batal',
			confirmButtonColor: '#dc3545', // Red
			cancelButtonColor: '#3b82f6', // Blue
			reverseButtons: true,
			focusCancel: true,
			buttonsStyling: true,
			allowOutsideClick: false,
		}).then((result) => {
			if (result.isConfirmed) {
				callback();
			}
		});
	}

	// Handle delete links/buttons
	function handleDeleteClick(event) {
		const link = event.currentTarget;
		const url = link.getAttribute('href');
		const message = link.getAttribute('data-confirm') || 'Tindakan ini tidak dapat dibatalkan.';

		event.preventDefault();

		showDeleteConfirmation(message, function() {
			window.location.href = url;
		});
	}

	// Handle delete form submissions
	function handleDeleteFormSubmit(event) {
		const form = event.currentTarget;
		const message = form.getAttribute('data-confirm') || 
		                form.querySelector('[data-confirm]')?.getAttribute('data-confirm') ||
		                'Tindakan ini tidak dapat dibatalkan.';

		event.preventDefault();
		event.stopPropagation();

		showDeleteConfirmation(message, function() {
			form.submit();
		});
	}

	// Attach to delete links
	const linkSelectors = [
		'a.btn-delete',
		'a.admin-link-danger',
		'a.js-confirm-delete',
	];
	document.querySelectorAll(linkSelectors.join(',')).forEach((a) => {
		a.addEventListener('click', handleDeleteClick);
	});

	// Attach to delete forms
	const deleteForms = document.querySelectorAll('form[method="post"]');
	deleteForms.forEach((form) => {
		const methodInput = form.querySelector('input[name="_method"][value="DELETE"]');
		const deleteButton = form.querySelector('button.btn-delete, input[type="submit"].btn-delete');
		
		if (methodInput && deleteButton) {
			form.addEventListener('submit', handleDeleteFormSubmit);
		}
	});

	// Show success message with Sweet Alert if available
	const successMessage = document.querySelector('.success-message');
	if (successMessage && typeof Swal !== 'undefined') {
		const messageText = successMessage.textContent.trim();
		Swal.fire({
			icon: 'success',
			title: 'Berhasil!',
			text: messageText,
			confirmButtonColor: '#16a34a',
			timer: 3000,
			timerProgressBar: true,
		});
		// Hide the original message
		successMessage.style.display = 'none';
	}

	// Sidebar toggle for mobile / minimizer
	const adminShell = document.querySelector('.admin-shell');
	const toggleBtn = document.querySelector('.admin-toggle-btn');
	const overlay = document.createElement('div');
	overlay.className = 'admin-overlay';
	if (adminShell) adminShell.appendChild(overlay);

	function openSidebar() {
		adminShell.classList.add('sidebar-open');
	}

	function closeSidebar() {
		adminShell.classList.remove('sidebar-open');
	}

	if (toggleBtn) {
		toggleBtn.addEventListener('click', function () {
			if (adminShell.classList.contains('sidebar-open')) {
				closeSidebar();
			} else {
				openSidebar();
			}
		});
	}

	overlay.addEventListener('click', closeSidebar);
});


