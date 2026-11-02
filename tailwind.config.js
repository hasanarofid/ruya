import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            colors: {
                brand: {
                    // Surfaces & Backgrounds
                    cream: '#FAF7F2',       // Warm ecru / off-white background utama
                    sand: '#F7E7EB',        // Soft dusty rose / blush tint untuk alternate card & bento
                    blush: '#F4D6DC',       // Romantic blush accent
                    
                    // Deep Accent & Logo Burgundy
                    dark: '#530A1E',        // Deep Royal Burgundy / Wine khas logo RÜYA
                    deep: '#3D0716',        // Darker burgundy untuk footer & high contrast
                    
                    // Primary Fashion Accents
                    primary: '#6B1D2F',     // Noble Burgundy untuk button & link hover
                    light: '#8C3147',       // Rose-wine untuk border & tag
                    
                    // Highlights & Secondary
                    leaf: '#A85165',        // Soft berry-rose
                    gold: '#D4AF37',        // Subtle metallic gold touch untuk aksen couture
                    cta: '#530A1E',         // CTA utama: deep elegant burgundy dengan teks cream
                    ctaHover: '#3D0716',
                },
            },
            fontFamily: {
                serif: ['"Playfair Display"', 'Cormorant Garamond', 'Georgia', ...defaultTheme.fontFamily.serif],
                sans: ['"Plus Jakarta Sans"', '"DM Sans"', ...defaultTheme.fontFamily.sans],
            },
            boxShadow: {
                'fashion': '0 20px 45px -15px rgba(83, 10, 30, 0.08)',
                'card-hover': '0 25px 50px -12px rgba(83, 10, 30, 0.16)',
                'cta-glow': '0 10px 30px -5px rgba(83, 10, 30, 0.35)',
            },
        },
    },

    plugins: [forms],
};
