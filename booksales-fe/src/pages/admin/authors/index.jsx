import { useEffect, useState } from "react";
import { getAuthors } from "../../../_services/authors";
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

  return (
    <div>
      <h1 className="text-xl font-bold mb-4">Authors</h1>

      <Link
        to="create"
        className="bg-blue-600 text-white px-3 py-2 rounded-md"
      >
        + Add Author
      </Link>

      <ul className="mt-4">
        {authors.map((author) => (
          <li key={author.id} className="p-2 border rounded mb-2">
            {author.name}
          </li>
        ))}
      </ul>
    </div>
  );
}
