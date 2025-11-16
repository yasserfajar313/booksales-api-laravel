import { useEffect, useState } from "react";
import { getAuthors, updateAuthor } from "../../../_services/authors";
import { useNavigate, useParams } from "react-router-dom";

export default function EditAuthor() {
  const { id } = useParams();
  const navigate = useNavigate();

  const [name, setName] = useState("");

  useEffect(() => {
    const fetchData = async () => {
      const data = await getAuthors();
      const author = data.find((a) => a.id == id);
      setName(author?.name || "");
    };
    fetchData();
  }, [id]);

  const handleSubmit = async (e) => {
    e.preventDefault();
    await updateAuthor(id, { name });
    navigate("/admin/authors");
  };

  return (
    <div className="p-5">
      <h1 className="text-xl font-bold mb-4">Edit Author</h1>

      <form onSubmit={handleSubmit}>
        <input
          type="text"
          value={name}
          className="border p-2 rounded w-full"
          onChange={(e) => setName(e.target.value)}
        />

        <button className="mt-4 bg-indigo-600 text-white px-4 py-2 rounded">
          Update
        </button>
      </form>
    </div>
  );
}
