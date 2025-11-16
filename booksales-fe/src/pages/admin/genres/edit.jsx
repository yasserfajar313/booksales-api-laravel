import { useEffect, useState } from "react";
import { getGenres, updateGenre } from "../../../_services/genres";
import { useNavigate, useParams } from "react-router-dom";

export default function EditGenre() {
  const { id } = useParams();
  const navigate = useNavigate();

  const [name, setName] = useState("");

  useEffect(() => {
    const fetchData = async () => {
      const data = await getGenres();
      const genre = data.find((g) => g.id == id);
      setName(genre?.name || "");
    };
    fetchData();
  }, [id]);

  const handleSubmit = async (e) => {
    e.preventDefault();
    await updateGenre(id, { name });
    navigate("/admin/genres");
  };

  return (
    <div className="p-5">
      <h1 className="text-xl font-bold mb-4">Edit Genre</h1>

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
