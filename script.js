const translations = {
    en: {
        welcome: "WELCOME!",
        description: "Find Mental Health and Special Education Support in Your Preferred Language",
        selectLanguage: "SELECT LANGUAGE",
        chatButton: "Questions? Chat with us!",
        resourceCenter: "RESOURCE CENTER",
        signupsignin: "SIGN UP / SIGN IN",
        englishButton: "English",
        arabicButton: "Arabic",
        dashboardButton: "DASHBOARD"
    },
    ar: {
        welcome: "مرحباً!",
        description: "ابحث عن دعم الصحة النفسية والتعليم الخاص بلغتك المفضلة",
        selectLanguage: "اختر اللغة",
        chatButton: "أسئلة؟ الدردشة معنا",
        resourceCenter: "مركز الموارد",
        signupsignin: "قم بالتسجيل / تسجيل الدخول",
        englishButton: "إنجليزي",
        arabicButton: "عربي",
        dashboardButton: "لوحة القيادة"
    }
};

function switchLanguage(lang) {
    document.getElementById("welcome-text").innerText = translations[lang].welcome;
    document.getElementById("description-text").innerText = translations[lang].description;
    document.getElementById("select-language-text").innerText = translations[lang].selectLanguage;
    document.getElementById("chat-button").innerText = translations[lang].chatButton;
    document.getElementById("resource-center").innerText = translations[lang].resourceCenter;
    document.getElementById("signup-signin").innerText = translations[lang].signupsignin;
    document.getElementById("english-button").innerText = translations[lang].englishButton;
    document.getElementById("arabic-button").innerText = translations[lang].arabicButton;
    document.getElementById("dashboard").innerText = translations[lang].arabicButton;



    document.body.setAttribute("dir", lang === "ar" ? "rtl" : "ltr"); // Set direction
}

document.addEventListener("DOMContentLoaded", () => {
    document.getElementById("english-button").addEventListener("click", () => switchLanguage("en"));
    document.getElementById("arabic-button").addEventListener("click", () => switchLanguage("ar"));
});
