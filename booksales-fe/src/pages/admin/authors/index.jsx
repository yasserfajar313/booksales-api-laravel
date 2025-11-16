import { useEffect, useState } from "react";
import { getAuthors, deleteAuthor } from "../../../_services/authors";
import { Link } from "react-router-dom";

export default function AdminAuthors() {
  const [authors, setAuthors] = useState([]);

  useEffect(() => {
    const fetchData = async () => {
      const data = await getAuthors();
      setAuthors(data);
    };
    fetchData();
  }, []);

  const handleDelete = async (id) => {
    if (!confirm("Delete this author?")) return;
    await deleteAuthor(id);
    setAuthors(authors.filter((a) => a.id !== id));
  };

  return (
    <div>
      <h1 className="text-xl font-bold mb-4">Authors</h1>

      <Link to="create" className="bg-blue-600 text-white px-3 py-2 rounded-md">
        + Add Author
      </Link>

      <ul className="mt-4">
        {authors.map((author) => (
          <li
            key={author.id}
            className="p-2 border rounded mb-2 flex justify-between"
          >
            <span>{author.name}</span>

            <div className="flex gap-2">
              <Link
                to={`${author.id}/edit`}
                className="px-2 py-1 bg-yellow-500 text-white rounded"
              >
                Edit
              </Link>

              <button
                onClick={() => handleDelete(author.id)}
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
