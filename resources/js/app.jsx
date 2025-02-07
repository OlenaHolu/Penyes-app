import React from 'react';
import ReactDOM from 'react-dom/client';

function AppReact() {
    return (
        <div>
            <h1>Hello, World!</h1>
        </div>
    );
}

const root = ReactDOM.createRoot(document.getElementById('appReact'));
root.render(<AppReact />);

/*
useEffect
.fetch
*/