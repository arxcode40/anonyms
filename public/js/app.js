"use strict";

(function ($) {
	const selectors = {
		copyLink: "#copyLink",
		email: "#email",
		screenshot: "#screenshot",
		scrollToTop: "#scrollToTop",
		secret: "#secret",
		secretCounter: "#secretCounter",
		shareLink: "#shareLink",
		toast: "#toast",
		toastBody: "#toastBody",
		username: "#username",
	};

	function showToast(message) {
		const toast = document.querySelector(selectors.toast);

		if (!toast) {
			return;
		}

		$(selectors.toastBody).text(message);
		bootstrap.Toast.getOrCreateInstance(toast).show();
	}

	async function copyText(text) {
		if (!globalThis.navigator?.clipboard?.writeText) {
			throw new Error("Clipboard API is not available.");
		}

		await globalThis.navigator.clipboard.writeText(text);
	}

	function updateSecretField() {
		const secretField = $(selectors.secret);

		if (!secretField.length) {
			return;
		}

		const borderHeight = secretField.outerHeight() - secretField.innerHeight();

		secretField.css("height", "auto");
		secretField.css("height", `${secretField.prop("scrollHeight") + borderHeight}px`);

		const secretLength = secretField.val().length;
		$(selectors.secretCounter)
			.text(`${secretLength}/255`)
			.toggleClass("text-danger", secretLength >= 255);
	}

	function bindScrollToTop() {
		const scrollButton = $(selectors.scrollToTop);

		if (!scrollButton.length) {
			return;
		}

		$(document).on("scroll", function () {
			scrollButton.toggleClass("d-none", $(this).scrollTop() < 20);
		});

		scrollButton.on("click", function () {
			$(document).scrollTop(0);
		});
	}

	function bindUsernameEmailSync() {
		const emailField = $(selectors.email);

		if (!emailField.length) {
			return;
		}

		$(selectors.username).on("input", function () {
			emailField.val(`${$(this).val()}@anonyms.local`);
		});
	}

	function bindPasswordToggle() {
		$(".btn-show-password").on("click", function () {
			const button = $(this);
			const passwordField = button.prev("input");
			const shouldShowPassword = passwordField.prop("type") !== "text";

			passwordField.attr("type", shouldShowPassword ? "text" : "password");
			button.attr(
				"aria-label",
				shouldShowPassword ? "Sembunyikan Kata Sandi" : "Tampilkan Kata Sandi",
			);
			button
				.children()
				.toggleClass("bi-eye", shouldShowPassword)
				.toggleClass("bi-eye-slash", !shouldShowPassword);
		});
	}

	function bindLinkActions() {
		$(selectors.copyLink).on("click", async function () {
			try {
				await copyText($("#url").val());
				showToast("Tautan berhasil disalin.");
			} catch (error) {
				showToast("Gagal menyalin tautan.");
			}
		});

		$(selectors.shareLink).on("click", async function () {
			const link = $("#url").val();

			try {
				if (!globalThis.navigator?.share) {
					await copyText(link);
					showToast("Browser tidak mendukung fitur bagikan. Tautan disalin.");
					return;
				}

				await globalThis.navigator.share({
					text: "Bagikan tautan Anonyms",
					title: "Bagikan tautan Anonyms",
					url: link,
				});
			} catch (error) {
				showToast("Gagal membagikan tautan.");
			}
		});
	}

	function bindSecretField() {
		$(selectors.secret).on("input", updateSecretField);
		updateSecretField();
	}

	function bindScreenshot() {
		$(selectors.screenshot).on("click", async function () {
			try {
				const screenshotArea = document.getElementById("screenshotArea");

				if (!screenshotArea || !globalThis.htmlToImage || !globalThis.download) {
					throw new Error("Screenshot dependency is not available.");
				}

				const fileName = globalThis.crypto?.randomUUID
					? globalThis.crypto.randomUUID()
					: `anonyms-${Date.now()}`;
				const dataUrl = await globalThis.htmlToImage.toPng(screenshotArea);

				globalThis.download(dataUrl, `${fileName}.png`);
			} catch (error) {
				showToast("Gagal membuat tangkapan layar.");
			}
		});
	}

	$(function () {
		bindScrollToTop();
		bindUsernameEmailSync();
		bindPasswordToggle();
		bindLinkActions();
		bindSecretField();
		bindScreenshot();
	});
})(jQuery);
