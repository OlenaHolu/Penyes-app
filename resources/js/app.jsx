import React from "react";
import ReactDOM from "react-dom/client";
import DrawManagement from "./components/DrawManagement";
import Background from "./components/Background"; 

const rootElement = document.getElementById("drawManagement");

if (rootElement) {
    const root = ReactDOM.createRoot(rootElement);
    root.render(
        <Background> 
            <DrawManagement /> 
        </Background>
    );
} else {
    console.error("Element with id 'drawManagement' not found.");
}
