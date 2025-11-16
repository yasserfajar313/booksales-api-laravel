import { useEffect, useState } from "react";
import { getGenres, deleteGenre } from "../../../_services/genres";
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

  const handleDelete = async (id) => {
    if (!confirm("Delete this genre?")) return;
    await deleteGenre(id);
    setGenres(genres.filter((g) => g.id !== id));
  };

  return (
    <div>
      <h1 className="text-xl font-bold mb-4">Genres</h1>

      <Link to="create" className="bg-blue-600 text-white px-3 py-2 rounded-md">
        + Add Genre
      </Link>

      <ul className="mt-4">
        {genres.map((genre) => (
          <li
            key={genre.id}
            className="p-2 border rounded mb-2 flex justify-between"
          >
            <span>{genre.name}</span>

            <div className="flex gap-2">
              <Link
                to={`${genre.id}/edit`}
                className="px-2 py-1 bg-yellow-500 text-white rounded"
              >
                Edit
              </Link>

              <button
                onClick={() => handleDelete(genre.id)}
                className="px-2 py-1 bg-red-600 text-white rounded"
              >
                Delete
              </button>
            </div>
          </li>
        ))}
      </ul>
    </div>
  );
}
