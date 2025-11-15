import { useEffect, useState } from "react";
import { getGenres } from "../../../_services/genres";
import { Link } from "react-router-dom";

export default function AdminGenres() {
  const [genres, setGenres] = useState([]);

  useEffect(() => {
    const fetchData = async () => {
      const data = await getGenres();
      setGenres(data);
    };
    fetchData();
  }, []);

  return (
    <div>
      <h1 className="text-xl font-bold mb-4">Genres</h1>

      <Link
        to="create"
        className="bg-blue-600 text-white px-3 py-2 rounded-md"
      >
        + Add Genre
      </Link>

      <ul className="mt-4">
        {genres.map((genre) => (
          <li key={genre.id} className="p-2 border rounded mb-2">
            {genre.name}
          </li>
        ))}
      </ul>
    </div>
  );
}
