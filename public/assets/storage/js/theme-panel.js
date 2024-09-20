function findStringInURL(searchString) {
    const currentURL = window.location.href;
    return currentURL.includes(searchString);
}

function ath_wp_footer_hook() {
    const siteUrl = window.location.href;

    const awaikenThemes = {
		'elixir-html': {
            'buy_link'			: 'https://1.envato.market/ZQ79Ok',
            'landing_page_link' : 'https://demo.awaikenthemes.com/landing/elixir-html/',
            'demo_link' 		: 'https://demo.awaikenthemes.com/html-preview/elixir/',
            'doc_link'			: ''
        },
		'quivox-html': {
            'buy_link'			: 'https://1.envato.market/rQP2jj',
            'landing_page_link' : 'https://demo.awaikenthemes.com/html-preview/quivox/',
            'demo_link' 		: 'https://demo.awaikenthemes.com/html-preview/quivox/html/',
            'doc_link'			: ''
        },
		'aziland-html': {
            'buy_link'			: 'https://1.envato.market/5gdkM1',
            'landing_page_link' : 'https://demo.awaikenthemes.com/html-preview/aziland/',
            'demo_link' 		: 'https://demo.awaikenthemes.com/html-preview/aziland/html/',
            'doc_link'			: ''
        },
		'theme-aziland': {
            'buy_link'			: 'https://1.envato.market/QyoXqA',
            'landing_page_link' : 'https://demo.awaikenthemes.com/landing/aziland/',
            'demo_link' 		: 'https://demo.awaikenthemes.com/theme-aziland/',
            'doc_link'			: 'https://docs.awaikenthemes.com/aziland/'
        },
		'zorvixa-html': {
            'buy_link'			: 'https://1.envato.market/q43rJN',
            'landing_page_link' : 'https://demo.awaikenthemes.com/html-preview/zorvixa/',
            'demo_link' 		: 'https://demo.awaikenthemes.com/html-preview/zorvixa/html/',
            'doc_link'			: ''
        },
		'jivux-html': {
            'buy_link'			: 'https://1.envato.market/B0JVPW',
            'landing_page_link' : 'https://demo.awaikenthemes.com/html-preview/jivux/',
            'demo_link' 		: 'https://demo.awaikenthemes.com/html-preview/jivux/html/',
            'doc_link'			: ''
        },
		'fwizz-html': {
            'buy_link'			: 'https://1.envato.market/Qyrjoo',
            'landing_page_link' : 'https://demo.awaikenthemes.com/html-preview/fwizz/',
            'demo_link' 		: 'https://demo.awaikenthemes.com/html-preview/fwizz/html/',
            'doc_link'			: ''
        },
        'glimy': {
            'buy_link'			: 'https://1.envato.market/3eWgYy',
            'landing_page_link' : '',
            'demo_link' 		: 'https://demo.awaikenthemes.com/glimy/',
            'doc_link'			: 'https://docs.awaikenthemes.com/glimy/'
        },
		'glimy-html': {
            'buy_link'			: 'https://1.envato.market/B0o109',
            'landing_page_link' : 'https://demo.awaikenthemes.com/html-preview/glimy/',
            'demo_link' 		: 'https://demo.awaikenthemes.com/html-preview/glimy/html/',
            'doc_link'			: ''
        },
		'solor': {
            'buy_link'			: 'https://1.envato.market/6e6KxK',
            'landing_page_link' : 'https://demo.awaikenthemes.com/landing/solor/',
            'demo_link' 		: 'https://demo.awaikenthemes.com/solor/',
            'doc_link'			: 'https://docs.awaikenthemes.com/solor/'
        },
		'solor-html': {
            'buy_link'			: 'https://1.envato.market/JzyeqR',
            'landing_page_link' : 'https://demo.awaikenthemes.com/html-preview/solor/',
            'demo_link' 		: 'https://demo.awaikenthemes.com/html-preview/solor/html/',
            'doc_link'			: ''
        },
		'weebix': {
            'buy_link'			: 'https://1.envato.market/Wq7m1M',
            'landing_page_link' : 'https://demo.awaikenthemes.com/landing/weebix/',
            'demo_link' 		: 'https://demo.awaikenthemes.com/weebix/',
            'doc_link'			: 'https://docs.awaikenthemes.com/weebix/'
        },
		'weebix-html': {
            'buy_link'			: 'https://1.envato.market/DKxV3y', //add to cart link
            'landing_page_link' : 'https://demo.awaikenthemes.com/landing/weebix-html/',
            'demo_link' 		: 'https://demo.awaikenthemes.com/html-preview/weebix/',
            'doc_link'			: ''
        },
		'theme-aerologix': {
            'buy_link'			: 'https://1.envato.market/3egDGB',
            'landing_page_link' : 'https://demo.awaikenthemes.com/landing/aerologix/',
            'demo_link' 		: 'https://demo.awaikenthemes.com/theme-aerologix/',
            'doc_link'			: 'https://docs.awaikenthemes.com/aerologix/'
        },
		'aerologix-html': {
            'buy_link'			: 'https://1.envato.market/k0YBeN',
            'landing_page_link' : 'https://demo.awaikenthemes.com/landing/aerologix-html/',
            'demo_link' 		: 'https://demo.awaikenthemes.com/html-preview/aerologix/',
            'doc_link'			: ''
        },
		'theme-medipro': {
            'buy_link'			: 'https://1.envato.market/vNYR7e',
            'landing_page_link' : 'https://demo.awaikenthemes.com/landing/medipro/',
            'demo_link' 		: 'https://demo.awaikenthemes.com/theme-medipro/',
            'doc_link'			: 'https://docs.awaikenthemes.com/medipro/'
        },
		'medipro-html': {
            'buy_link'			: 'https://1.envato.market/xkY4Wv',
            'landing_page_link' : 'https://demo.awaikenthemes.com/landing/medipro-html/',
            'demo_link' 		: 'https://demo.awaikenthemes.com/html-preview/medipro/',
            'doc_link'			: ''
        },
		'wexico': {
            'buy_link'			: 'https://1.envato.market/DK7X7j',
            'landing_page_link' : 'https://demo.awaikenthemes.com/landing/wexico/',
            'demo_link' 		: 'https://demo.awaikenthemes.com/wexico/',
            'doc_link'			: 'https://docs.awaikenthemes.com/wexico/'
        },
		'wexico-html': {
            'buy_link'			: 'https://1.envato.market/eKYV9z',
            'landing_page_link' : 'https://demo.awaikenthemes.com/landing/wexico-html/',
            'demo_link' 		: 'https://demo.awaikenthemes.com/html-preview/wexico/',
            'doc_link'			: ''
        },
		'soare': {
            'buy_link'			: 'https://1.envato.market/5g4Ez2',
            'landing_page_link' : 'https://demo.awaikenthemes.com/landing/soare/',
            'demo_link' 		: 'https://demo.awaikenthemes.com/soare/',
            'doc_link'			: 'https://docs.awaikenthemes.com/soare/'
        },
		'soare-html': {
            'buy_link'			: 'https://1.envato.market/B07Zrq',
            'landing_page_link' : 'https://demo.awaikenthemes.com/landing/soare-html/',
            'demo_link' 		: 'https://demo.awaikenthemes.com/html-preview/soare/',
            'doc_link'			: ''
        },
		'seore': {
            'buy_link'			: 'https://1.envato.market/PyXY76',
            'landing_page_link' : 'https://demo.awaikenthemes.com/landing/seore/',
            'demo_link' 		: 'https://demo.awaikenthemes.com/seore/',
            'doc_link'			: 'https://docs.awaikenthemes.com/seore/'
        },
		'seore-html': {
            'buy_link'			: 'https://1.envato.market/XYJEoa',
            'landing_page_link' : 'https://demo.awaikenthemes.com/landing/seore-html/',
            'demo_link' 		: 'https://demo.awaikenthemes.com/html-preview/seore/',
            'doc_link'			: ''
        },
		'builtup': {
            'buy_link'			: 'https://1.envato.market/rQZGEj',
            'landing_page_link' : 'https://demo.awaikenthemes.com/landing/builtup/',
            'demo_link' 		: 'https://demo.awaikenthemes.com/builtup/',
            'doc_link'			: 'https://docs.awaikenthemes.com/builtup/'
        },
		'builtup-html': {
            'buy_link'			: 'https://1.envato.market/y2VaAy',
            'landing_page_link' : 'https://demo.awaikenthemes.com/landing/builtup-html/',
            'demo_link' 		: 'https://demo.awaikenthemes.com/html-preview/builtup/',
            'doc_link'			: ''
        }
    };

    let buy_link = '';
    let doc_link = '';
    let demo_link = '';
    let item 	= '';
	
	
	if(findStringInURL('html-preview/builtup')) {
		item	=	'builtup-html';
	}else if(findStringInURL('html-preview/seore')) {
		item	=	'seore-html';
	}else if(findStringInURL('html-preview/elixir')) {
		item	=	'elixir-html';
	}else if(findStringInURL('html-preview/soare')) {
		item	=	'soare-html';
	}else if(findStringInURL('html-preview/wexico')) {
		item	=	'wexico-html';
	}else if(findStringInURL('html-preview/medipro')) {
		item	=	'medipro-html';
	}else if(findStringInURL('html-preview/aerologix')) {
		item	=	'aerologix-html';
	}else if(findStringInURL('html-preview/weebix')) {
		item	=	'weebix-html';
	}else if(findStringInURL('html-preview/quivox')) {
		item	=	'quivox-html';
	}else if(findStringInURL('html-preview/aziland')) {
		item	=	'aziland-html';
	}else if(findStringInURL('html-preview/zorvixa')) {
		item	=	'zorvixa-html';
	}else if(findStringInURL('html-preview/jivux')) {
		item	=	'jivux-html';
	}else if(findStringInURL('html-preview/fwizz')) {
		item	=	'fwizz-html';
	}else if(findStringInURL('html-preview/solor')) {
		item	=	'solor-html';
	}else if(findStringInURL('solor')) {
		item	=	'solor';
	}else if(findStringInURL('weebix')) {
		item	=	'weebix';
	}else if(findStringInURL('theme-aerologix')) {
		item	=	'theme-aerologix';
	}else if(findStringInURL('theme-medipro')) {
		item	=	'theme-medipro';
	}else if(findStringInURL('wexico')) {
		item	=	'wexico';
	}else if(findStringInURL('soare')) {
		item	=	'soare';
	}else if(findStringInURL('seore')) {
		item	=	'seore';
	}else if(findStringInURL('builtup')) {
		item	=	'builtup';
	}else if(findStringInURL('glimy')) {
		item	=	'glimy';
	}else if(findStringInURL('theme-aziland')) {
		item	=	'theme-aziland';
	}
	
	
    if (awaikenThemes[item]) {
        buy_link = awaikenThemes[item]['buy_link'];

        if (awaikenThemes[item]['doc_link']) {
            doc_link = awaikenThemes[item]['doc_link'];
        }
        
        if (awaikenThemes[item]['demo_link']) {
            demo_link = awaikenThemes[item]['demo_link'];
        }

        const themePanel = `
		<div class="explore_theme_panel">
			${doc_link ? `<a href="${doc_link}" target="_blank" title="Documentation"><i class="fas fa-file-lines"></i></a>` : ''}
			<a href="${buy_link}" title="Buy Now"><i class="fas fa-cart-shopping"></i></a> </div>
			<style type="text/css">
				.explore_theme_panel {
					width: 50px;
					position: fixed;
					top: 50%;
					right: 0;
					background: #fff;
					transform: translateY(-50%);
					border-top: 1px solid #e8e8e8;
					border-left: 1px solid #e8e8e8;
					border-bottom: 1px solid #e8e8e8;
					border-radius: 10px 0 0 10px;
					z-index: 10000;
				}
				.explore_theme_panel a {
					position: relative;
					width: 50px;
					height: 50px;
					display: flex;
					align-items: center;
					justify-content: center;
					font-size: 22px;
					color: #333;
					transition: all 0.4s ease-in-out;
					border-bottom: 1px solid #e8e8e8;
				}
				.explore_theme_panel a:last-child {
					border-bottom: none;
				}
				
			</style>`;
			document.body.insertAdjacentHTML('beforeend', themePanel);

         // Select all elements with the .buy-link class
        const buyLinkElements = document.querySelectorAll('.buy-link');
    
        // Loop through each element and set the href attribute
        buyLinkElements.forEach(element => {
            element.href = buy_link;
        });
        
        // Select all elements with the .demo-link class
        const demoLinkElements = document.querySelectorAll('.demo-link');
    
        // Loop through each element and set the href attribute
        demoLinkElements.forEach(element => {
            element.href = demo_link;
        });

    }
}

document.addEventListener("DOMContentLoaded", ath_wp_footer_hook);
