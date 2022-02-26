import React from 'react';
import ReactDOM from 'react-dom';
function HomePage() {
    return (
        <html>
            <head>
                <title>Home Page</title>
            </head>
            <body>
                <div id="top-bar" className = "top-page-wrapper">
                    <h1>Home Page</h1>
                </div>
            </body>
        </html>
    );
}

export default HomePage;

if (document.getElementById('home')) {
    ReactDOM.render(<HomePage />, document.getElementById('home'));
}
