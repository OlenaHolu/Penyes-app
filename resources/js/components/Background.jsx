import React from "react";

export default function Background({ children }) {
  return (
    <div className="min-h-screen w-full bg-gradient-to-r from-blue-100 to-purple-300 flex flex-col items-center justify-center">
      {children}
    </div>
  );
}
