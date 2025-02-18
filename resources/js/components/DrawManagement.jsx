import React, { useState, useEffect } from "react";

export default function DrawManagement() {
  const API_BASE_URL = "http://localhost:8080/api";

  const [year, setYear] = useState(new Date().getFullYear());
  const [rangeYears, setRangeYears] = useState([]);
  const [locations, setLocations] = useState([]);
  const [errors, setErrors] = useState([]);

  useEffect(() => {
    fetch(`${API_BASE_URL}/draw/years`)
      .then((res) => res.json())
      .then((data) => setRangeYears(data))
      .catch((err) => console.error("Error fetching years:", err));
  }, []); // Runs only once on mount

  useEffect(() => {
    fetch(`${API_BASE_URL}/draw/locations?year=${year}`)
      .then((res) => res.json())
      .then((data) => setLocations(data))
      .catch((err) => console.error("Error fetching locations:", err));
  }, [year]); // Runs when year changes

  const handleYearChange = (e) => {
    setYear(parseInt(e.target.value)); //
  };

  return (
    <div className="max-w-3xl mx-auto p-6">
      <h1 className="text-2xl font-bold text-gray-800 mb-6 text-center">Sorteos</h1>

      {/* Year Selection */}
      <div className="mb-4">
        <label htmlFor="year-select" className="block text-gray-700 font-semibold">
          Seleccione el Año:
        </label>
        <select
          id="year-select"
          name="year"
          className="form-select w-full border rounded p-2 mt-2"
          onChange={handleYearChange}
          value={year}
        >
          {rangeYears.map((itemYear) => (
            <option key={itemYear} value={itemYear}>
              {itemYear}
            </option>
          ))}
        </select>
      </div>

      {/* Error Messages */}
      {errors.length > 0 && (
        <div className="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 rounded">
          <ul>
            {errors.map((error, index) => (
              <li key={index}>{error}</li>
            ))}
          </ul>
        </div>
      )}

      {/* Plaza Visualization */}
      <div className="flex justify-center">
        <table className="border-collapse border border-gray-400">
          <tbody>
            {Array.from({ length: 5 }).map((_, row) => (
              <tr key={row}>
                {Array.from({ length: 9 }).map((_, col) => {
                  const location = locations.find((loc) => loc.y === row && loc.x === col);
                  const isPerimeter = row === 0 || row === 4 || col === 0 || col === 8;

                  return (
                    <td
                      key={`${row}-${col}`}
                      className={`w-16 h-16 text-center align-middle ${isPerimeter
                          ? "border border-black bg-gray-300 font-bold"
                          : "bg-transparent"
                        }`}
                    >
                      {location ? (
                        <a href={`/crews/${location.crew.id}`} className="text-lg font-semibold hover:underline">
                          {location.crew.name}
                        </a>
                      ) : null}
                    </td>
                  );
                })}
              </tr>
            ))}
          </tbody>
        </table>
      </div>
    </div>
  );
}
